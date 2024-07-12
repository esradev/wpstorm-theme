import { createRoot } from '@wordpress/element'
import { HashRouter } from 'react-router-dom'

import './index.css'
import App from './App'

const container = document.getElementById('wpstorm-theme-settings-dashboard')
const root = createRoot(container)

root.render(
  <HashRouter>
    <App />
  </HashRouter>
)
