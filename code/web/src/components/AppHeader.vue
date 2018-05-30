<template>
  <div class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">TUTU</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <nav class="nav nav-pills nav-fill">
            <a class="nav-item nav-link" href="#" @click="selectPhotoTagClick(item.value)" :class="currentPhotoTag==item.value ? 'active' : ''" v-for="(item, index) in photoTagsList" :key="index">{{ item.text }}</a>
          </nav>
      </div>
    </nav>
  </div>
</template>

<script>
import {mapState, mapGetters, mapActions, mapMutations} from 'vuex'

export default {
  name: 'Appheader',
  data () {
    return {
    }
  },
  methods: {
    selectPhotoTagClick(photoTag){
      console.log('a');
      this.$store.commit('setPhotoTag', photoTag);
    }
  },
  computed: {
    ...mapState({
      currentPhotoTag: state => state.currentPhotoTag,
      photoTagsList: state => state.photoTagsList,
    })
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
