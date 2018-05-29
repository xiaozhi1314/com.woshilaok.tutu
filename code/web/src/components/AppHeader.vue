<template>
  <div class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">TUTU</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">菜单二</a>
        <a class="nav-item nav-link" href="#">菜单三</a>
        <a class="nav-item nav-link" href="#">菜单四</a>
        <a class="nav-item nav-link" href="#">菜单五</a>
        </div>
    </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: 'Appheader',
  data () {
    return {
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
