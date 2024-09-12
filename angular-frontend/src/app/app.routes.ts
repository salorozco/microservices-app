import {Routes} from "@angular/router";
import { USER_ROUTES } from "./user/presentation/user-routing";

export const routes: Routes = [
  { path: 'users', children: USER_ROUTES },
];
