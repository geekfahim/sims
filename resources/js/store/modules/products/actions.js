import Axios from 'axios'
import* as actions from '../../action-types'
import* as mutations from '../../mutation-types'


export default{
[actions.ADD_PRODUCT]({commit},payload){
    Axios.post('/product',payload)
        .then(res=>{

        })
        .catch(err=>{
            commit(mutations.SET_ERRORS,err.response.data.errors)
        })
}

}
