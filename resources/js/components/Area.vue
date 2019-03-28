<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Area Component</div>

                    <div class="card-body">
                        
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>พื้นที่</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>มือถือ</th>
                                    <th>สาขา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="area in mobileArea" :key="area.AreaId">
                                    <td>{{ area.AreaId }}</td>
                                    <td>{{ area.AreaName }}</td>
                                    <td>{{ area.AreaPhone }}</td>
                                    <td>{{ area.AreaTotal }}</td>
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
                areas: [],
                loading: true,
                errored: false,
            }
        },

        computed: {
            mobileArea() {
                return this.areas.map((b) => {
                    if(b.AreaPhone.length === 10){
                        let x = b.AreaPhone.substring(0, 3)+'-'+b.AreaPhone.substring(3, 7)+'-'+b.AreaPhone.substring(7, 10)
                        return {
                            AreaId: b.AreaId,
                            AreaName: b.AreaName,
                            AreaPhone: x,
                            AreaTotal: b.AreaTotal
                        }
                    }
                })
            }
        },

        methods: {
            loadArea() {
                axios
                    .get('http://10.22.2.77:8089/api/v1/area/count')
                    .then(response => (this.areas = response.data))
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() => this.loading = false)
            },
        },

        mounted() {
            this.loadArea()
            console.log('Area Component mounted.')
        }
    }
</script>