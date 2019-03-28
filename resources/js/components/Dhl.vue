<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    
                    <div class="card-header">Dhl Component</div>
                    <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="รหัสสาขา เช่น S001 S500" style="width:300px"
                            v-model="BrnCode"
                            @keyup.enter="loadDhl()">
                    </div>

                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr v-for="x in dhl" :key="x.BrnCode">
                                    <td>{{ x.BrnCode }}</td>
                                    <td>{{ x.BrnName }}</td>
                                    <td>{{ x.BrnAddress }}</td>
                                    <td>{{ x.BrnTel }}</td>
                                </tr>                      
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
export default {

    data() {
        return {
            BrnCode: '',
            dhl: '',
        }
    },

    methods: {
        loadDhl() {
            axios
                .get('http://10.22.2.77:8088/dhl/index.php?'
                    +'BrnCode='+this.BrnCode
                )
                .then(response => {
                    //console.log(response.data)
                    this.dhl = response.data
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() => this.loading = false)
        }
    },

    mounted() {
        console.log('Dhl Component api => api_pacific/dhl')
    }    
}


</script>
