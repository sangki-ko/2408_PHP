import { createStore } from "vuex";
import  board  from "./modules/board.js";

// export default : 선언한 것들을 내보내겠다 라는 뜻
export default createStore({
    modules: {
        board,
    },
});
