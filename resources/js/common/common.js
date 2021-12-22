export default{
    data(){
        return {
            feedbackMessages:{ 
                successMsg(msg){
                    Vue.$toast.success(msg,{
                        position: 'top'
                    });
                },
                errorMsg(msg){
                    Vue.$toast.error(msg,{
                        position: 'top'
                    }); 
                },
            }
        }
    },
    methods: {
        callApi(method,url,data){
            try{
               return axios({
                    method: method,
                    url: url,
                    data: data
                })
            } catch(e){
               return e.response
            }
        },
    },
}