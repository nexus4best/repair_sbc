<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        DashBoard Component
                        <span class="countRight" v-if="countTotal">{{ countTotal }}</span>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="PrvRgn" v-model="PrvRgn" @change="getSearchPrvRgn()">
                                            <option value="">ภูมิภาค</option>
                                            <option value="1">กทมและปริมณฑล</option>
                                            <option value="2">ภาคกลาง</option>
                                            <option value="3">ภาคตะวันออก</option>
                                            <option value="4">ภาคเหนือ</option>
                                            <option value="5">ภาคใต้</option>
                                            <option value="6">ภาคอิสาน</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="BrnPrv" v-model="BrnPrv" @change="getSearch()" v-if="PrvRgn > 0">
                                            <option value="">จังหวัด</option>
                                            <option v-for="x in getPrvCode" :key="x.PrvCode" :value="x.PrvCode">
                                                {{ x.PrvName }}
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th  width="120px">รหัส</th>
                                    <th>ชื่อสาขา</th>
                                    <th>CTS</th>
                                    <th>Setup</th>
                                    <th>เขต</th>
                                </tr>
                            </thead>
                            <tr>
                                <th>
                                    <input type="text" class="form-control" name="BrnCode" v-model="BrnCode" @keyup="getSearch()">
                                </th>
                                <th>
                                    <input type="text" class="form-control" name="BrnName" v-model="BrnName" @keyup="getSearch()">
                                </th>                                
                                <th>
                                    <select class="form-control" name="CtsId" v-model="CtsId" @change="getSearch()">
                                        <option value="">&nbsp;</option>
                                        <option v-for="x in cts" :key="x.CtsId" :value="x.CtsId">
                                            {{ x.CtsName }}
                                        </option>
                                    </select>
                                </th>
                                <th>
                                    <select class="form-control" name="SetupId" v-model="SetupId" @change="getSearch()">
                                        <option value="">&nbsp;</option>
                                        <option v-for="x in setup" :key="x.SetupId" :value="x.SetupId">
                                            {{ x.SetupName }}
                                        </option>
                                    </select>                                    
                                </th>
                                <th>
                                    <select class="form-control" name="AreaId" v-model="AreaId" @change="getSearch()">
                                        <option value="">&nbsp;</option>
                                        <option v-for="x in area" :key="x.AreaId" :value="x.AreaId">
                                            {{ x.AreaId }} {{ x.AreaName }}
                                        </option>
                                    </select>                                    
                                </th>
                            </tr>                              
                            <tbody>
                                <tr v-for="zone in zones" :key="zone.BrnCode">
                                    <td width="120px">{{ zone.BrnCode }}</td>
                                    <td>{{ zone.BrnName }}</td>
                                    <td>{{ zone.CtsName }}</td>
                                    <td>{{ zone.SetupName }}</td>
                                    <td>{{ zone.AreaName }}</td>
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
                zones: [],
                countTotal: '',
                cts: [],
                area: [],
                setup: [],
                province: [],
                BrnCode: '',
                BrnName: '',
                CtsId: '',
                AreaId: '',
                SetupId: '',
                BrnPrv: '',
                PrvRgn: '',
                loading: true,
                errored: false,
            }
        },

        watch: {
            PrvRgn: function (val) {
                this.BrnPrv = '';
            }
        },

        // watch: {
        //     PrvRgn: function (val) {
        //         axios
        //             .get
        //                 (
        //                     'http://10.22.2.77:8089/api/v1/brnzone/brnprv?PrvRgn='
        //                     +'&PrvRgn='+this.PrvRgn
        //                 )
        //             .then(response => {
        //                 this.province = response.data.data.data
        //             })
        //     }
        // },

        computed: {
            getPrvCode() {
                return this.province.filter(x => x.PrvRgn === this.PrvRgn)
            }
        },        

        methods: {
            getSearchPrvRgn() {
                this.BrnPrv = ''
                axios
                    .get
                        (
                            'http://10.22.2.77:8089/api/v1/brnzone/search'
                            +'?CtsId='+this.CtsId
                            +'&SetupId='+this.SetupId
                            +'&AreaId='+this.AreaId
                            +'&BrnCode='+this.BrnCode
                            +'&BrnName='+this.BrnName 
                            +'&BrnPrv='+this.BrnPrv 
                            +'&PrvRgn='+this.PrvRgn
                        )
                    .then(response => {
                        this.zones = response.data.data.data,
                        this.countTotal = response.data.data.total
                        //this.cts = response.data.cts,
                        //this.area = response.data.area,
                        //this.setup = response.data.setup
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() => this.loading = false)                
            },

            getSearch() {
                axios
                    .get
                        (
                            'http://10.22.2.77:8089/api/v1/brnzone/search'
                            +'?CtsId='+this.CtsId
                            +'&SetupId='+this.SetupId
                            +'&AreaId='+this.AreaId
                            +'&BrnCode='+this.BrnCode
                            +'&BrnName='+this.BrnName 
                            +'&BrnPrv='+this.BrnPrv 
                            +'&PrvRgn='+this.PrvRgn
                        )
                    .then(response => {
                        this.zones = response.data.data.data,
                        this.countTotal = response.data.data.total
                        //this.cts = response.data.cts,
                        //this.area = response.data.area,
                        //this.setup = response.data.setup
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() => this.loading = false)                
            },

            loadZone() {
                axios
                    .get('http://10.22.2.77:8089/api/v1/brnzone/search')
                    .then(response => {
                        this.zones = response.data.data.data,
                        this.countTotal = response.data.data.total,
                        this.cts = response.data.cts,
                        this.area = response.data.area,
                        this.setup = response.data.setup,
                        this.province = response.data.province
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() => this.loading = false)
            },
        },

        mounted() {
            this.loadZone()
            console.log('DashBoard Component api => DashboardController@brnZone')
        }
    }
</script>

<style>
    .countRight {
    float: right;
}
</style>