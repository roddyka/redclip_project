<script setup>
import Posts from './components/Posts.vue'
import Form from './components/Form.vue';
// import conections from "./api/conections";
// console.log(conections.getPosts());

</script>
 <script>
  import api from "./api/api";
  export default {
   name: "Posts",
   data() {
     return {
       posts: {},
       isShow: false
     };
   },
   created() {
     this.getPosts();
   },
   methods: {
     getPosts() {
       api
         .get("/posts/")
         .then((res) => {
          this.posts = res.data;
          console.log(res.data)
         })
         .catch((error) => {
          //  console.log(error);
         });
     }, 
     updatePost(e) {
      console.log(e);
      this.posts.push(e);
    }
   },
  };
</script>
<template>
  <header>
    <img alt="Vue logo" class="logo" src="./assets/clip.png" width="125" height="125" />
    <div class="title_and_button">
      <h1 class="title">RedClip, enjoy our community!</h1> 
      <button class="button button_up" v-on:click="isShow = !isShow">Write your ideas here...</button>
    </div>
    
      <!-- <HelloWorld msg="You did it!" /> -->
    <Form v-show="isShow" />
  </header>
  <main>
    <!-- <TheWelcome /> -->
      <div class="wrapper">
      <Posts 
      v-for="post in this.posts" :key="post.id" 
      v-show="post.id_post === null"
      :id=post.id
      :title= post.title
      :content=post.content
      :url=post.image_url
      :like=post.like
      :dislike=post.dislike
      :newPost="false" />
      
      <!-- <HelloWorld msg="You did it!" /> -->
    </div>
  </main>
</template>

<style>
@import './assets/base.css';

#app {
  max-width: 1280px;
  margin: 0 auto;
  padding: 2rem;

  font-weight: normal;
}

header {
  line-height: 1.5;
  flex-direction: column;
  display: flex;
  align-items: center;
}

.title_and_button {
  display: flex;
  align-items: center;
  flex-direction: row;
  justify-content: center;
  align-content: center;
  flex-wrap: wrap;
  gap: 20px;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

a,
.green {
  text-decoration: none;
  color: #ff1901;
  transition: 0.4s;
}


.area_reply {
  margin-top: 10px;
}


.buttons {
    display: flex;
    flex-direction: row;
    align-content: center;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    flex-wrap: wrap;
}

.votes {
  display: flex;
  flex-wrap: wrap;
}

.button {
  cursor: pointer;
  padding: 10px;
  width: auto;
  border: none;
  border-radius: 8px;
  color: white;

  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  align-content: center;
  flex-direction: row;
  gap: 3px;
}

.button_up{
  background-color: #0984e3;
}

.button_down{
  background-color: #d63031;
  margin-left: 10px;
}
.svg_down {
    transform: rotate(180deg);
}

.area_reply {
  width: 100%;
  border: none;
}


.reply_area {
  margin-top: 10px;
  display: flex;
  justify-content: space-around;
  align-items: center;
}

.reply {
  font-weight: bold;
  color:black;
  background-color: #fdcb6e;
}

.title {
  text-align: center;
  margin-bottom: 10px;
}

@media (hover: hover) {
  a:hover {
    background-color: hsla(160, 100%, 37%, 0.2);
  }
}

/* @media (min-width: 1024px) {
  body {
    display: flex;
    place-items: center;
  }

  #app {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    align-content: center;
  }

  header {
    display: flex;
    place-items: center;
    margin-bottom: 50px;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  .logo {
    margin: 0 2rem 0 0;
  }
} */
</style>
