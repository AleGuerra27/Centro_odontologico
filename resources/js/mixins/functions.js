export const functions = {
    data() {
        return {
            loading_search_exchange_rate: false,
            loading_search: false
        }
    },
    methods: {
        searchExchangeRate() {
            return new Promise((resolve) => {
                this.loading_search_exchange_rate = true
                this.$http.post(`/services/exchange_rate`, this.form)
                    .then(response => {
                        let res = response.data
                        if (res.success) {
                            this.data = res.data;
                            this.form.buy = res.data[this.form.cur_date].buy;
                            this.form.sell = res.data[this.form.cur_date].sell;
                            this.$message.success(res.message)
                        } else {
                            this.$message.error(res.message)
                            this.loading_search_exchange_rate = false
                        }
                        resolve()
                    })
                    .catch(error => {
                        console.log(error.response)
                        this.loading_search_exchange_rate = false
                    })
                    .then(() => {
                        this.loading_search_exchange_rate = false
                    })
            })
        },
    }
};

export const exchangeRate = {
    methods: {
        async searchExchangeRateByDate(exchange_rate_date) {
            let response = await this.$http.get(`/services/exchange_rate/${exchange_rate_date}`)
            return parseFloat(response.data.sale)
        }
    }
};


