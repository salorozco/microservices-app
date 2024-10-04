import { Message} from "./message.model";

export class Conversation {
  id: number;
  title: string;
  messages: Message[];
  participants: [];
  createdAt: Date;
  updatedAt: Date;

  constructor(data: any) {
    this.id = data.id;
    this.title = data.title;
    this.messages = data.messages ? data.messages.map((messageData: any) => new Message(messageData)) : [];
    this.participants = data.participants;
    this.createdAt = new Date(data.createAt);
    this.updatedAt = new Date(data.updatedAt);
  }
}
