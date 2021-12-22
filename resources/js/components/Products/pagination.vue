<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a @click.prevent="changePage(meta.current_page-1)" class="page-link" href="#">Previous</a>
                  </li>
                  <li class="page-item" :class="{'active':meta.current_page===page}" v-for="(page, index) in meta.last_page" :key="index">
                    <a class="page-link" @click.prevent="changePage(page)" href="#" > {{page}} </a>
                  </li>
                  <li class="page-item">
                    <a @click.prevent="changePage(meta.current_page+1)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
              </nav>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
  props: ['meta'],
        methods: {
           changePage(page){
             //alert(page)
            Event.$emit('pagination',page)
           }
        },
        mounted() {
            
        }
    }
</script>
