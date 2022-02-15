import { Entity, Column, PrimaryGeneratedColumn, ManyToOne } from "typeorm";

import { Region } from './region'

@Entity()
export class Pax {

    @PrimaryGeneratedColumn()
    id: number;

    @ManyToOne(() => Region)
    region: Region

    @Column()
    name: string;

    @Column("datetime")
    created: Date

    @Column("datetime")
    updated: Date
}