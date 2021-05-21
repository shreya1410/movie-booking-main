import movieComponent from "./components/Admin/movieComponent";
import castComponent from "./components/Admin/castComponent";
import ShowMovieComponent from "./components/ShowMovieComponent";
import MovieDetailComponent from "./components/MovieDetailComponent";
import TheatreComponent from "./components/Admin/TheatreComponent";

const route = [

    {
        path :'/movie',
        component: movieComponent
    },
    {
        path :'/cast',
        component: castComponent
    },
    {
        path :'/showmovie',
        component: ShowMovieComponent
    },
    {
        path  : '/moviedetail',
        component: MovieDetailComponent
    },
    {
        path : '/theatre',
        component: TheatreComponent
    }
];

export default route;
