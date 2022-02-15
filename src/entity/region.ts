import { Entity, Column, PrimaryGeneratedColumn } from "typeorm";

@Entity()
export class Region {

    @PrimaryGeneratedColumn()
    id: number;

    @Column()
    name: string;

    @Column("datetime")
    created: Date

    @Column("datetime")
    updated: Date
}