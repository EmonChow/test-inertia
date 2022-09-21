<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
  
    </script>
    
    <template>
        <AppLayout title="Dashboard">
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Post
                </h2>
            </template>

            <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link class="text-green-100 bg-green-500 rounded"  :href="route('posts.create')">
                                  Post Create 
                            </Link>
                        </div>
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Title</td>
                                <td class="px-4 py-2">Description</td>
                                <td class="px-4 py-2">Name</td>
                                <td class="px-4 py-2">Action</td>
                               
                            </thead>
                            <tbody>
                                <tr v-for="post in posts.data" :key="post.id">
                                    <td class="px-4 py-2">{{ post.id }}</td>
                                    <td class="px-4 py-2">{{ post.title }}</td>
                                    <td class="px-4 py-2">
                                        {{ post.description }}
                                    </td>
                                    <td class="px-4 py-2">{{ post.name }}</td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link  class="text-green-700" :href="route('posts.edit', post.id)">Edit</Link><hr>
                                        <Link  @click="destroyPost(post.id)" class="text-red-700">Delete</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination :links="posts.links" />
                     
                    </div>
                </div>
            </div>
        </div>
        </AppLayout>
    </template>

    <script>
        import { Link } from "@inertiajs/inertia-vue3";
        export default {
            props: {
             posts: Object
         
           },
         components: {
            Link
         },
         methods:{
            destroyPost(){
                this.$inertia.delete(route("posts.destroy", id))
            }
         }
        }
    </script>
    