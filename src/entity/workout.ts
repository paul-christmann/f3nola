import { Entity, Column, PrimaryGeneratedColumn, ManyToOne } from "typeorm";

import { Location } from "./location"
import { Region } from "./region"
import { WorkoutType } from "./workoutType"

@Entity()
export class Workout {

    @PrimaryGeneratedColumn()
    id: number;

    @ManyToOne(() => WorkoutType)
    region: Region

    @ManyToOne(() => WorkoutType)
    workoutType: WorkoutType

    @ManyToOne(() => Location)
    location: Location

    @Column()
    name: string;

    @Column("datetime")
    created: Date

    @Column("datetime")
    updated: Date
}