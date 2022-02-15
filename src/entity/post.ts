import { Entity, Column, PrimaryGeneratedColumn, ManyToOne } from "typeorm";

import { Beatdown } from "./beatdown";
import { Pax } from "./pax";

@Entity()
export class Post {

    @PrimaryGeneratedColumn()
    id: number;

    @ManyToOne(() => Beatdown)
    beatdown: Beatdown

    @ManyToOne(() => Pax)
    pax: Pax

    @Column()
    name: string;

    @Column("datetime")
    created: Date

    @Column("datetime")
    updated: Date
}