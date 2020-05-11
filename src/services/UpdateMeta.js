/**
 * Update de metas do yoast
 */
const updateMeta = {
  beforeDestroy(){
    this.removeAllMeta(this.post.yoast_meta)
  },
  methods: {
    createAllMeta(allMetas) {
      if (!Array.isArray(allMetas)) throw new TypeError('allMetas precisa ser array')
      for (const meta of allMetas) {
        var elem = document.createElement('meta')
        for (const key in meta) {
          elem.setAttribute(key, meta[key])
        }
        document.head.append(elem)
      }
    },
    removeAllMeta(allMetas) {
      if (!Array.isArray(allMetas)) return
      for (const meta of allMetas) {
        let selector = 'meta'
        for (const key in meta) {
          if (key != 'content'){
            selector += '[' + key + '="' + meta[key] + '"]'
          }
        }
        let metaElem = document.querySelector(selector)
        if(metaElem){
          metaElem.parentNode.removeChild(metaElem);
        }
      }
    }
  },
  watch: {
    'meta.title': function(newV) {
      document.title = newV
    },
    'meta.tags': function(newV, OldV) {
      this.removeAllMeta(OldV)
      this.createAllMeta(newV)
    }
  }
};
export default updateMeta
