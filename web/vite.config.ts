import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import { quasar, transformAssetUrls } from '@quasar/vite-plugin'
import tsconfigPaths from 'vite-tsconfig-paths'
const path = require('path')

// https://vitejs.dev/config/
export default defineConfig({
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'),
    },
  },
  server: {
    port: 3000,
    https: true,
  },
  plugins: [
    vue({
      template: { transformAssetUrls },
    }),
    tsconfigPaths(),
    quasar({
      sassVariables: 'src/css/quasar.variables.scss',
    }),
  ],
})
