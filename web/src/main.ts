import { createApp } from 'vue'
import { Quasar } from 'quasar'

// Import icon libraries
import '@quasar/extras/material-icons/material-icons.css'
import '@quasar/extras/material-icons-outlined/material-icons-outlined.css'
import '@quasar/extras/fontawesome-v6/fontawesome-v6.css'

// Import Quasar css
import 'quasar/src/css/index.sass'

import App from './App.vue'

import router from './router'

const myApp = createApp(App)

myApp.use(router)
myApp.use(Quasar, {
  plugins: {}, // import Quasar plugins and add here
})
myApp.mount('#app')
