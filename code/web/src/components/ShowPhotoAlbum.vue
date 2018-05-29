<template>
  <div class="showphotoalbum full-float-layer" :style="isShow ? '' : 'display:none'"  @click="closePhotoAlbum">
    <div class="full-header full-float-layer-close" @click="closePhotoAlbum"></div>
    <div class="full-body">
      <div class="white_content">
        <ul class="list-inline photoitem" v-for="(item, index) in imageList" :key="index">
          <li class="list-inline-item"><img :src="item" /></li>
        </ul>
      </div>
    </div>
    <div class="full-footer"></div>
  </div>
</template>

<script>
import {mapState, mapGetters, mapActions, mapMutations} from 'vuex'

export default {
  name: 'ShowPhotoAlbum',
  data () {
    return {
      imageList: []
    }
  },
  computed: {
    ...mapState({
      isShow: state => state.ShowPhotoAlbum.isShow
    })
  },
  watch: {
    // isShow: function(newValue, oldValue){
    //   this.isShow = newValue;
    // }
  },
  methods: {
    closePhotoAlbum(){
      this.$store.commit('setIsShow', false);
    }
  },
  mounted(){
    let imageItem = 'http://placehold.it/1800x1800?text=';
    for(let i=0; i<10; i++){
      this.imageList.push(imageItem+i);
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .full-float-layer{
    position: fixed; 
    top: 0%; 
    left: 0%; 
    width: 100%;
    height: 100%;
    background-color: rgb(95, 95, 95); 
    z-index:1001; 
    -moz-opacity: 0.8; 
    opacity:.80; 
    filter: alpha(opacity=88); 
  }
  .full-float-layer-close{
    position: absolute; 
    left: 93.8%; 
    width: 128px; 
    height: 128px; 
    background-image: url(~@/assets/close.svg);
    background-repeat: no-repeat;
    z-index:1002; 
    overflow: auto; 
  }
  .white_content { 
    position: absolute; 
    top: 10%; 
    left: 10%; 
    width: 80%; 
    height: 80%; 
    padding: 20px; 
    /* border-radius: 2px; */
    /* border: 2px solid rgb(155, 108, 27);  */
    /* background-color: black;  */
    z-index:1002; 
    overflow: auto; 
  }
  .white_content img{
    max-width: 900px;
    border-radius: 25px;
  }
</style>
