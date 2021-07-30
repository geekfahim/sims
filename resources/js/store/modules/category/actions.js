import Axios from 'axios'
import * as actions from '../../action-types'

export default {
    [actions.GET_CATEGORIES]({ commit }) {
        Axios.get('/api/categories')
            .then(res => {
                console.log(res.data);
            })
            .catch (err  => {
                console.log(err);
        })
    }
}
