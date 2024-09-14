import { Injectable } from '@angular/core';
import {map, Observable} from 'rxjs';
import { UserRepository } from '../Infrastructure/user-repository';
import { User } from '../domain/user.model';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  constructor(private userRepository: UserRepository) {}

  getUsers(): Observable<User[]> {
    return this.userRepository.getAllUsers();
  }

  getUserById(id: number): Observable<User> {
    return this.userRepository.getUserById(id).pipe(
      map(data => new User(data))
    );
  }

  createUser(user: User): Observable<User> {
    return this.userRepository.createUser(user);
  }

  updateUser(user: User): Observable<User> {
    return this.userRepository.updateUser(user);
  }

  deleteUser(id: number): Observable<void> {
    return this.userRepository.deleteUser(id);
  }
}
