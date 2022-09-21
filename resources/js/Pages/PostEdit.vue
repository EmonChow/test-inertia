<template>

    
     <div class="py-12">
         <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
             <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                 <div class="p-6 bg-white border-b border-gray-200">
         <form @submit.prevent="updatePost">
             <div>
                 <label for="title">Title</label>
                     <input  type="text" v-model="formData.title" class="border w-full px-4 py-2  mt-2 rounded-md focus:outline-none  focus:ring-1"/>              
              </div>
                 <div class="mt-4">
                     <label for="title">Description</label>
                      <textarea  name="description"  type="text" v-model="formData.description" class="border w-full px-4 py-2  mt-2 rounded-md focus:outline-none  focus:ring-1"></textarea>
                             
                      </div>
                      <div>
                 <label for="title">Name</label>
                     <input  type="text" v-model="formData.name" class="border w-full px-4 py-2  mt-2 rounded-md focus:outline-none  focus:ring-1"/>
              </div>
                     <div class="flex items-center mt-4">
             <button class="px-6 py-2 text-white bg-gray-900 rounded">Submit</button>
                 </div>
          </form>
         </div>
         </div>
         </div>
 </div>

</template>

<script>
    import { useForm } from "@inertiajs/inertia-vue3";
        export default {
          
            setup(props) {
            const formData = useForm({
                title: props.post.title,
                description: props.post.description,
                name: props.post.name,
            });
    
            return { formData };
        },
        props: {
           post: Object,
         },
            methods: {
           updatePost(){
             this.formData.put(route("posts.update", this.post.id))
           }
    
        }
            
        }
       
    
    </script>