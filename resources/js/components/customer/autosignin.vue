<template>
    <div>

    </div>
</template>
<script>
export default {
    methods: {
   //sign user as admin
        autoSignIn(){
            axios.get('/checkifsignedIn')
            .then((res)=>{
         if (res.data=='false') {
        axios.get('/autosignin')
        .then((res)=>{
           this.$swal({
             position: 'top-end',
             icon: 'success',
             title: 'You Have Been Automatically Signed as Admininistrator. You Have Full Access To This Application!',
             showConfirmButton: false,
             timer: 10000
           })
           setTimeout(()=>{
             window.location.reload();
           },10000);
        })
          .catch(()=>{
            this.$swal({
             position: 'top-end',
             icon: 'error',
             title: 'Unable To Automatically Signed as Admininistrator. You Dont Have Full Access To This Application!. Please Create An account and request for admin role',
             showConfirmButton: false,
             timer: 10000
           })
           })
                }
            })

        }
    },
    mounted() {
        this.autoSignIn();
    },
}
</script>

