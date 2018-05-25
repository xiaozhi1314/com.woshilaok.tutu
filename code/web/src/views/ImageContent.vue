<template>
  <div class="image-content">
    <h2>imagecontent</h2>
    <div class="images row">
        <div class="card image-card" v-for="(item, index) in images" v-bind:key="index">
            <img class="card-img-top" :src="item.image+index">
            <div class="card-body">
                <h4 class="card-title">{{ item.title }}</h4>
                <p class="card-text">{{ item.desc }}</p>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ImageContent',
  data () {
    return {
        images: [
            { 'image': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'},
            { 'image': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'},
            { 'image': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'},
            { 'image': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'},
            { 'image': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'},
            { 'image': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'},
            { 'image': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'},
            { 'image': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'},
        ]
    }
  },
  methods:{
      
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .image-item{
        width:500px;
        text-align: center;
    }
    .card{
        width:360px;
        margin: 10px 10px;
    }
    .card-img-top{
        background-image: url('~@/assets/default_300x200.png');
    }
</style>
