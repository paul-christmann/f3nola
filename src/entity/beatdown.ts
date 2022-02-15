import { Entity, Column, PrimaryGeneratedColumn, ManyToOne } from "typeorm";

import { Workout } from "./workout"

@Entity()
export class Beatdown {

    @PrimaryGeneratedColumn()
    id: number;

    @ManyToOne(() => Workout)
    workout: Workout

    @Column()
    name: string;

    @Column("datetime")
    created: Date

    @Column("datetime")
    updated: Date
}