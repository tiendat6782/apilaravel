import React from "react";
import MobileNav from "./MobileNav";
import { ModeToggle } from "../ModeToggle";
import GlobalSearch from "../search/GlobalSearch";
import { ShoppingCart } from "lucide-react";
import Link from "next/link";

import { UserButton } from "@clerk/nextjs";
const Navbar = () => {
  return (
    <>
      <nav className="flex_between p-3">
        {" "}
        <div className="flex_start">
          {" "}
          <MobileNav />
          <ModeToggle />
          <GlobalSearch />
        </div>
        <Link href="/" className="font-bold">
          Ruby Store
        </Link>
        <div className="flex_between">
          <UserButton />
          <Link href="/cart">
            <ShoppingCart className="text_primary h-5 w-5" />
          </Link>
        </div>
      </nav>
    </>
  );
};

export default Navbar;
