import Axios from 'axios'
import* as actions from '../../action-types'
import* as mutations from '../../mutation-types'


export default{
[actions.GET_BRAND]({commit}){
Axios.get('/api/brand')
    .then(res=>{
        if(res.data.success==true){
            commit(mutations.SET_BRAND,res.data.data)
        }
    })
    .catch(err=>{
        console.log(err.response);
    })
}

}

