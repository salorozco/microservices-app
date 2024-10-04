import {ActivatedRoute, RouterModule} from "@angular/router";
import {CommonModule} from "@angular/common";
import {Component, OnInit} from "@angular/core";
import {UserService} from "../../application/user.service";
import {User} from "../../domain/user.model";
import {PostListComponent} from "../post-list/post-list.component";
import {FaIconComponent} from "@fortawesome/angular-fontawesome";
import { ConversationsModalComponent } from '../conversations-modal/conversations-modal.component';


@Component({
  selector: 'app-user-detail',
  standalone: true,
  imports: [CommonModule, RouterModule, PostListComponent, FaIconComponent, ConversationsModalComponent],
  templateUrl: './user-detail.component.html',
  styleUrls: ['./user-detail.component.css']
})
export class UserDetailComponent implements OnInit {
  user: User | undefined;

  constructor(
    private route: ActivatedRoute,
    private userService: UserService
  ) {}

  isConversationsOpen = false;

  // Handler to open the conversations modal
  onIconClick(): void {
    this.isConversationsOpen = true;
  }


  closeModal() {
    this.isConversationsOpen = false;
  }

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get('id');
    if (id) {
      this.userService.getUserById(+id).subscribe((data) => {
        this.user = data;
      });
    }
  }
}
