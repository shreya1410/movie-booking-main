import movieComponent from "./components/Admin/movieComponent";
import castComponent from "./components/Admin/castComponent";
import ShowMovieComponent from "./components/ShowMovieComponent";
import MovieDetailComponent from "./components/MovieDetailComponent";
import TheatreComponent from "./components/Admin/TheatreComponent";
import CastDetailComponent from "./components/CastDetailComponent";
import TheatreDetailComponent from "./components/Admin/TheatreDetailComponent";
import BookTicketComponent from "./components/BookTicketComponent";

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
        name : MovieDetailComponent,
        component: MovieDetailComponent
    },
    {
        path : '/theatre',
        component: TheatreComponent
    },
    {
        path :'/castdetail',
        component: CastDetailComponent,
    },
    {
        path: '/theatredetail',
        component: TheatreDetailComponent,
    },
    {
        path :'/bookticket',
        component: BookTicketComponent,
    }
];

export default route;
