<script setup>
import api from "../api/api";
import Posts from "./Posts.vue";
defineProps({
  id: {
    type: String,
  }
  ,
  content: {
    type: String,
    required: true
  }
  ,
  title: {
    type: String,
    required: true
  }
  ,
  url: {
    type: String,
  }
  ,
  like: {
    type: String,
  }
  ,
  dislike: {
    type: String,
  },
})

</script>
<script>
export default {
name: "Post",
props: ['item'],
data() {
    return {
      form: {
        id: null,
        title: null,
        content: null,
        url: null,
        like: null,
        dislike: null,
        id_post: null,
      },
      error: false,
      addPost: false

    }
},
// created() {
//     // this.sendPost();
// },
methods: {
    sendPost(e){
      e.preventDefault()
      // //console.log(this.form);
      api
        .post("/posts/", {
                  title: this.title,
                  content: this.content,
                  image_url: this.url,
                  id_post: this.id,
            })
        .then((res) => {
          // this.$emit('updatePost', {
          //         title: this.title,
          //         content: this.content,
          //         image_url: this.url,
          //         id_post: this.id,
          //   });
          this.form = JSON.parse(JSON.stringify(res.data));
          // this.updatePost(this.form);
          if(this.form.content !== null || this.form.content !== ''){
            this.addPost = true;
          }
          window.location.reload();
          // //console.log(this.form.content);
        })
        .catch((error) => {
          this.error = true;
          // //console.log(error);
        });
    }
}
};
</script>
<template>
    <div class="block_post">
      <h3>What are you thinking?</h3>
      <form
        id="app"
        @submit.prevent="sendPost"
      >
        <input
            id="id"
            v-model="id"
            type="hidden"
            name="id"
          >
        <p>
          <label for="title">Title</label>
          <input
            id="title"
            v-model="title"
            type="text"
            name="title"
            required="required"
          >
        </p>

        <p>
          <label for="content">Content</label>
          <textarea
            id="content"
            v-model="content"
            name="content"
          ></textarea>
        </p>

        <p>
          <label for="url">Image Url</label>
           <input
            id="url"
            v-model="url"
            type="text"
            name="url"
          >
        </p>
        <p v-show="error">Thers an error in your message...</p>
        <p>
          <input class="button button_up"
            type="submit"
            value="Submit"
          >
        </p>

      </form>
    </div>
    <!-- <div v-show="this.addPost">
    <Posts 
      :id=this.form.id
      :title= this.form.title
      :content=this.form.content
      :url=this.form.url
      :like=this.form.like
      :dislike=this.form.dislike
      :newPost="true" /></div> -->
</template>

<style scoped>
h1 {
  font-weight: 500;
  font-size: 2.6rem;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}
.block_post {
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
    align-items: center;
    max-width: 500px;

    background: #00000014;
    border-radius: 12px;
    padding: 10px 30px 0 30px;

    margin-bottom: 30px;

    /* position: absolute;
    z-index: 9999;
    background-color: #4e4e4e;
    left: 53%;
    top: 30px;
    color: white; */
}

form {
  display: flex;
  flex-direction: column;
  align-content: flex-end;
  justify-content: center;
  align-items: flex-start;
  gap: 10px;}

label {
  font-weight: bold;
  text-align: left;
  margin-bottom: 10px;
}

input[type="text"], textarea {
  width: 300px;
  height: 30px;
  border: none;
  border-radius: 8px;
}

textarea {
  height: 100px;
}

p {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  flex-wrap: wrap;
}

p:last-child {
  align-self: flex-end;
}


</style>
