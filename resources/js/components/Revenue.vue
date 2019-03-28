<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    
                    <div class="card-header">Revenue Component</div>
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">
                            ค้นหา {{search_revenue}} {{search_brnname}} {{search_computer}} {{search_cshcode}}
                            <span v-if="showLength > 0">พบ</span>
                            <span v-if="showLength > 0" style="color:red">{{ showLength }}</span>
                        </label>
                        <select class="form-control" name="search" v-model="search">
                            <option value="1">เลขสรรพากร</option>
                            <option value="2">ชื่อ-สาขา</option>
                            <option value="3">ชื่อ-คอมพิวเตอร์</option>
                            <option value="4">CshCode</option>
                        </select>   
                        &nbsp;
                        <input type="text" class="form-control" placeholder="เลขสรรพากร" name="search_revenue" 
                            v-if="search=='1'" v-model="search_revenue" @keyup="loadRevenue()"> 
                        <input type="text" class="form-control" placeholder="ชื่อ-สาขา เช่น โลตัส บิ๊กซี บางนา บางใหญ่" name="search_brnname" 
                            v-if="search=='2'" v-model="search_brnname" @keyup="loadRevenue()">     
                        <input type="text" class="form-control" placeholder="ชื่อ-คอมพิวเตอร์ เช่น S001 C01 C02" name="search_computer" 
                            v-if="search=='3'" v-model="search_computer" @keyup="loadRevenue()"> 
                        <select class="form-control" name="search_cshcode" v-model="search_cshcode" v-if="search=='4'" @change="loadRevenue()">
                            <option value="">&nbsp;</option>
                            <option v-for="x in cshCodeGroup" :key="x.CshCode" :value="x.CshCode">
                                {{ x.CshCode }}
                            </option>
                        </select>    
                    </div>
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark" v-if="showLength >= 1">
                                <tr>
                                    <th width="120px">คอมพิวเตอร์</th>
                                    <th>ชื่อ-สาขา</th>
                                    <th>CshCode</th>
                                    <th>สรรพากร</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="x in revenue" :key="x.CshDatabaseServerAlone">
                                    <td>{{ x.CshDatabaseServerAlone }}</td>
                                    <td>{{ x.BrnName }}</td>
                                    <td>{{ x.CshCode }}</td>
                                    <td>{{ x.CshReceiptPosCashier }}</td>
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
                search: '',
                search_revenue: '',
                search_brnname: '',
                search_computer: '',
                search_cshcode: '',
                revenue: [],
                cshCodeGroup: [],
                showLength: '',
                loading: true,
                errored: false,
            }
        },

        watch: {
            search: function (val) {
                this.revenue = ''
                this.showLength = ''   
                this.search_revenue= '' 
                this.search_brnname= '' 
                this.search_computer= '' 
                this.search_cshcode= ''                                  
            },
            search_revenue: function(val){
                if(this.search_revenue.length===0){
                    this.revenue = ''
                    this.showLength = ''
                }
            },
            search_brnname: function(val){
                if(this.search_brnname.length===0){
                    this.revenue = ''
                    this.showLength = ''
                }
            },    
            search_computer: function(val){
                if(this.search_computer.length===0){
                    this.revenue = ''
                    this.showLength = ''
                }
            },  
            search_cshcode: function(val){
                if(this.search_cshcode.length===0){
                    this.revenue = ''
                    this.showLength = ''
                }
            },      
        },

        methods: {
            loadRevenue() {
                if(this.search==='1' && this.search_revenue.length >= 1){
                    axios
                        .get('http://10.22.2.77:8088/revenue/index.php?'
                            +'CshReceiptPosCashier='+this.search_revenue
                        )
                        .then(response => {
                            //console.log(this.search_revenue.length)
                            this.revenue = response.data.data
                            this.showLength = response.data.data.length
                            //this.cshCodeGroup = response.data.cshCodeGroup
                        })
                        .catch(error => {
                            console.log(error)
                            this.errored = true
                        })
                        .finally(() => this.loading = false)
                } else if(this.search==='2' && this.search_brnname.length >= 1){
                    axios
                        .get('http://10.22.2.77:8088/revenue/index.php?'
                            +'BrnName='+this.search_brnname
                        )
                        .then(response => {
                            this.revenue = response.data.data
                            this.showLength = response.data.data.length
                        })
                        .catch(error => {
                            console.log(error)
                            this.errored = true
                        })
                        .finally(() => this.loading = false)
                } else if(this.search==='3' && this.search_computer.length >= 1){
                    axios
                        .get('http://10.22.2.77:8088/revenue/index.php?'
                            +'CshDatabaseServerAlone='+this.search_computer
                        )
                        .then(response => {
                            this.revenue = response.data.data
                            this.showLength = response.data.data.length
                        })
                        .catch(error => {
                            console.log(error)
                            this.errored = true
                        })
                        .finally(() => this.loading = false)
                } else if(this.search==='4' && this.search_cshcode.length >= 1){
                    axios
                        .get('http://10.22.2.77:8088/revenue/index.php?'
                            +'CshCode='+this.search_cshcode
                        )
                        .then(response => {
                            this.revenue = response.data.data
                            this.showLength = response.data.data.length
                        })
                        .catch(error => {
                            console.log(error)
                            this.errored = true
                        })
                        .finally(() => this.loading = false)
                }
            },
        },

        mounted() {
            axios.get('http://10.22.2.77:8088/revenue/index.php')
            .then(response => {
                //console.log(response.data.cshCodeGroup)
                //this.revenue = response.data.data
                this.cshCodeGroup = response.data.cshCodeGroup
	        })
            console.log('Revenue Component api => api_pacific/revenue')
        }
    }
</script>