<template>
  <div>
    <!--
      type属性がhiddenであるinputタグを追加
      value属性は算出プロパティtagsJsonとする
    -->
    <input
      type="hidden"
      name="tags"
      :value="tagsJson"
    >
    <vue-tags-input
      v-model="tag"
      :tags="tags"
      placeholder="タグを5個まで入力できます"
      :autocomplete-items="filteredItems"
      :add-on-key="[13, 32]"
      @tags-changed="newTags => tags = newTags"
    />
  </div>
</template>

<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
  components: {
    VueTagsInput,
  },
  props: {
    // Bladeから渡されたタグ情報は、プロパティinitialTagsで受け取る
    initialTags: {
      type: Array,
      default: [],
    },
    // 全タグ情報をVue Tags Inputでの自動補完に使用
    autocompleteItems: {
      type: Array,
      default: [],
    },
  },
  data() {
    return {
      tag: '',
      tags: this.initialTags, //初期値としてセット
    };
  },
  computed: {
    filteredItems() {
      return this.autocompleteItems.filter(i => {
        return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
      });
    },
    tagsJson() {
      return JSON.stringify(this.tags)
    },
  },
};
</script>
<style lang="css" scoped>
  .vue-tags-input {
    max-width: inherit;
  }
</style>
<style lang="css">
  .vue-tags-input .ti-tag {
    background: transparent;
    border: 1px solid #747373;
    color: #747373;
    margin-right: 4px;
    border-radius: 0px;
    font-size: 13px;
  }
</style>
