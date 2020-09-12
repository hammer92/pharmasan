import Vue from 'vue'
import Card from './Card'
import Child from './Child'
import Button from './Button'
import Checkbox from './Checkbox'
import Can from './Can'
import { HasError, AlertError, AlertSuccess } from 'vform'

// Components that are registered globaly.
[
  Can,
  Card,
  Child,
  Button,
  Checkbox,
  HasError,
  AlertError,
  AlertSuccess
].forEach(Component => {
  Vue.component(Component.name, Component)
})
