"use client";
import React from "react";
import {
  Sheet,
  SheetClose,
  SheetContent,
  SheetTrigger,
} from "@/components/ui/sheet";
import { Menu } from "lucide-react";
import { Button } from "@/components/ui/button";
import { navLinks } from "@/constants/navLink";
import Link from "next/link";

const NavContent = () => {
  return (
    <section className="flex w-full flex-col gap-6 pt-16">
      {navLinks.map((item) => {
        return (
          <SheetClose asChild key={item.route}>
            <Link href={item.path} className="">
              <p>{item.title}</p>
            </Link>
          </SheetClose>
        );
      })}
    </section>
  );
};
const ToggleNav = () => {
  return (
    <Sheet>
      <SheetTrigger asChild>
        <Button className="background_primary" variant="outline" size="icon">
          <Menu className="text_primary" />
        </Button>
      </SheetTrigger>
      <SheetContent side="left">
        <SheetClose asChild>
          <p>Ruby Store</p>
        </SheetClose>
        <div>
          <SheetClose asChild>
            <NavContent />
          </SheetClose>
        </div>
      </SheetContent>
    </Sheet>
  );
};

export default ToggleNav;
