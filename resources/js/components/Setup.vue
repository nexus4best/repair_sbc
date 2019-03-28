<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Setup Component</div>

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
                                <tr v-for="setup in mobileSetup" :key="setup.SetupId">
                                    <td>{{ setup.SetupName }}</td>
                                    <td>{{ setup.SetupPhone }}</td>
                                    <td>{{ setup.SetupTotal }}</td>
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
                setups: [],
                loading: true,
                errored: false,
            }
        },

        computed: {
            mobileSetup() {
                return this.setups.map((b) => {
                    if(b.SetupPhone.length === 10){
                        let x = b.SetupPhone.substring(0, 3)+'-'+b.SetupPhone.substring(3, 7)+'-'+b.SetupPhone.substring(7, 10)
                        return {
                            SetupName: b.SetupName,
                            SetupPhone: x,
                            SetupTotal: b.SetupTotal
                        }
                    }
                })
            }
        },

        methods: {
            loadSetup() {
                axios
                    .get('http://10.22.2.77:8089/api/v1/setup/count')
                    .then(response => (this.setups = response.data))
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() => this.loading = false)
            },
        },

        mounted() {
            this.loadSetup()
            console.log('Setup Component mounted.')
        }
    }
</script>