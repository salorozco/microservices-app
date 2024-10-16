export class Notification {
  id: number;
  recipientId: number;
  actorId: number;
  entityId: number;
  entityType: string;
  message: string;
  type: string;
  status: string;
  createdAt: Date;

  constructor(data: any) {
    this.id = data.id;
    this.recipientId = data.recipientId;
    this.actorId = data.actorId;
    this.entityId = data.entityId;
    this.entityType = data.entityType;
    this.message = data.message;
    this.type = data.type;
    this.status = data.status;
    this.createdAt = new Date(data.createdAt.date);
  }

}
