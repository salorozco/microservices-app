export class Subscription {
  id: number;
  userId: number;
  targetId: number;
  targetType: string;
  createdAt: Date;
  updatedAt: Date;

  constructor(data: any) {
    this.id = data.id;
    this.userId = data.userId;
    this.targetId = data.targetId;
    this.targetType = data.targetType;
    this.createdAt = data.createdAt.date;
    this.updatedAt = data.updatedAt.date;
  }
}
