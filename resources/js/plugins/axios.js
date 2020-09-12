import axios from 'axios'
import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import Swal from 'sweetalert2'
import i18n from '~/plugins/i18n'

let loader = null
// Request interceptor
axios.interceptors.request.use(request => {
  const token = store.getters['auth/token']
  if (token) {
    request.headers.common['Authorization'] = `Bearer ${token}`
  }

  const locale = store.getters['lang/locale']
  if (locale) {
    request.headers.common['Accept-Language'] = locale
  }

  // request.headers['X-Socket-Id'] = Echo.socketId()
  const getloader = !request.notLoader
  if (getloader) {
    loader = Vue.$loading.show({
      loader: 'dots'
    })
  }

  return request
})

// Response interceptor
axios.interceptors.response.use(response => {
  if (loader !== null) loader.hide(); loader = null
  return { status: response.status, ...response.data }
}, error => {
  if (loader !== null) loader.hide(); loader = null
  const { status, data } = error.response

  if (status >= 500) {
    Swal.fire({
      type: 'error',
      title: i18n.t('error_alert_title'),
      text: i18n.t('error_alert_text'),
      reverseButtons: true,
      confirmButtonText: i18n.t('ok'),
      cancelButtonText: i18n.t('cancel')
    })
  }

  if (status === 401 && store.getters['auth/check']) {
    Swal.fire({
      type: 'warning',
      title: i18n.t('token_expired_alert_title'),
      text: i18n.t('token_expired_alert_text'),
      reverseButtons: true,
      confirmButtonText: i18n.t('ok'),
      cancelButtonText: i18n.t('cancel')
    }).then(() => {
      store.commit('auth/LOGOUT')

      router.push({ name: 'login' })
    })
  }

  return Promise.reject({ status, message: data, ...error })
})
