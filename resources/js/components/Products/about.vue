<template>
    <div v-html="about">
        
    </div>
</template>

<style >
    
</style>

<script>

export default {
    props: ['aboutid'],
    data() {
        return {
            about: null,
        }
    },
    methods: {
        fetchAbout(){
            axios.get('/showproductdata/' + this.aboutid)
            .then((data)=>{
               this.about = data.data.about;
               console.log(this.about)
            })
            .catch(()=>{
                alert('problem fetching about')
            })
        }
    },
    mounted() {
        console.log(Number(this.aboutid))
        this.fetchAbout();
    },
}
</script>