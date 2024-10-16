import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { FaIconLibrary } from '@fortawesome/angular-fontawesome';
import {faBell, faComments, faUsers} from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  constructor( private library: FaIconLibrary) {
    library.addIcons(faComments); // Add the faComments icon to the library
    library.addIcons(faBell)
    library.addIcons(faUsers)
  }
  title = 'angular-frontend';
}
