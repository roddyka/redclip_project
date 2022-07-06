import api from "../api/api";


export async function getPosts() {
        return api
          .get("/posts/")
          .then((res) => {
            res.data;
            // console.log(res.data)
          })
          .catch((error) => {
            console.log(error);
          });
    }

 export async function getComments(id){
        api
            .get("/posts/"+id+"/comments")
            .then((res) => {
            return res.data;
            console.log(res.data)
            })
            .catch((error) => {
            console.log(error);
            });
        }

export default {getPosts, getComments}