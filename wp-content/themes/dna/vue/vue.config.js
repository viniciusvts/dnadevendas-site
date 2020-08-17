module.exports = {
  assetsDir: process.env.NODE_ENV === 'production'
    ? './wp-content/themes/dna/vue/dist/'
    : './'
}