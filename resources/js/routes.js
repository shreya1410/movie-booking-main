import ExampleComponent from "./components/ExampleComponent";
import movieComponent from "./components/movieComponent";
import castComponent from "./components/castComponent";

const route = [
    {
        path :'/',
        component : ExampleComponent
    },
    {
        path :'/movie',
        component: movieComponent
    },
    {
        path :'/cast',
        component: castComponent
    }
];

export default route;
