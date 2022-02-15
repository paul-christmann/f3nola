import { Entity, Column, PrimaryGeneratedColumn } from "typeorm";

@Entity("workout_type")
export class WorkoutType {

    @PrimaryGeneratedColumn()
    id: number;

    @Column()
    name: string;

    @Column("datetime")
    created: Date

    @Column("datetime")
    updated: Date
}