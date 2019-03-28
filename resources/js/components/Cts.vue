<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">CTS Component</div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>มือถือ</th>
                                    <th>สาขา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cts in mobileCts" :key="cts.CtsId">
                                    <td>{{ cts.CtsName }}</td>
                                    <td>{{ cts.CtsPhone }}</td>
                                    <td>{{ cts.CtsTotal }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <br>
                        <div v-if="loading" style="color:red">Loading...</div>
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
                cts: [],
                loading: true,
                errored: false,
            }
        },

        computed: {
            mobileCts() {
                return this.cts.map((b) => {
                    if(b.CtsPhone.length === 10){
                        let x = b.CtsPhone.substring(0, 3)+'-'+b.CtsPhone.substring(3, 7)+'-'+b.CtsPhone.substring(7, 10)
                        return {
                            CtsName: b.CtsName,
                            CtsPhone: x,
                            CtsTotal: b.CtsTotal
                        }
                    }
                })
            }
        },

        methods: {
            loadCts() {
                axios
                    .get('http://10.22.2.77:8089/api/v1/cts/count')
                    .then(response => (this.cts = response.data))
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() => this.loading = false)
            },
        },

        mounted() {
            this.loadCts()
            console.log('CTS Component mounted.')
        }
    }
</script>