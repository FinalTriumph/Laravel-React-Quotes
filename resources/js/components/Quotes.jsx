import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ResponsivePagination from 'react-responsive-pagination';
// import 'react-responsive-pagination/themes/classic.css';
// import 'react-responsive-pagination/themes/minimal.css';

export default function Quotes() {
    const [quotes, setQuotes] = useState(null);

    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(null);

    function getQuotes(page) {
        axios.get(`https://laravel-react-quotes.dev/api/quotes?page=${page}`)
            .then(response => {
                setQuotes(response.data.quotes);

                setCurrentPage(page);
                setTotalPages(response.data.totalPages);
            }).catch(error => {
                console.error(error.message);
            });
    }

    useEffect(() => {
        getQuotes(1);
    }, []);

    function showQuotes() {
        if (!quotes) {
            return (null);
        }

        return (
            <div>
                <div className="grid grid-cols-2">
                    {quotes.map(quote => (
                        <div
                            key={quote.id}
                            className="flex flex-col max-w-sm bg-slate-100 text-slate-800 p-6 m-2 rounded-md"
                        >
                            <p className="font-bold">{quote.quote}</p>
                            <p className="mb-4">- {quote.author}</p>
                            <div className="flex mt-auto text-sm text-slate-600">
                                <p className="mr-auto">{quote.savedBy}</p>
                                <p>{quote.savedAt}</p>
                            </div>
                        </div>
                    ))}
                </div>
                {totalPages && (
                    <ResponsivePagination
                        current={currentPage}
                        total={totalPages}
                        onPageChange={(newPage) => getQuotes(newPage)}
                        className="flex justify-center m-2 mt-4"
                        pageItemClassName="bg-slate-100 hover:bg-slate-600 hover:text-slate-100"
                        activeItemClassName="bg-slate-700 text-slate-100"
                        disabledItemClassName="text-slate-300 pointer-events-none"
                        pageLinkClassName="inline-block py-2 px-4"
                        previousClassName="rounded-l-md"
                        nextClassName="rounded-r-md"
                    />
                )}
            </div>
        );
    }

    return (showQuotes());
}
