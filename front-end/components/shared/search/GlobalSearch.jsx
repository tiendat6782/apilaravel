import { Button } from "@/components/ui/button";
import { Search } from "lucide-react";
import React from "react";

const GlobalSearch = () => {
  return (
    <>
      <Button variant="outline" size="icon">
        <Search className="text_primary h-5 w-5" />
      </Button>
    </>
  );
};

export default GlobalSearch;
