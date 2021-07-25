import './bootstrap'
import Vue from 'vue'
import ArticleTagsInput from './components/ArticleTagsInput' // タグ入力のVueコンポーネントを記事入力フォームのBladeに組み込む

const app = new Vue({
  el: '#app',
  components: {
    ArticleTagsInput,
  }
})
