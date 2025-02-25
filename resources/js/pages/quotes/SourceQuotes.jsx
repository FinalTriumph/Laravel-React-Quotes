import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';
import SectionTitle from '../../components/SectionTitle.jsx';

export default function SourceQuotes({ page, source, sources }) {
    return (
        <div className="text-left">
            <SectionTitle
                title={`All saved quotes from ${sources[source] ? sources[source].title : source}`}
                link={sources[source] ? sources[source].website : null}
            />
            <QuotesContainer type="source" page={page} source={source} sources={sources} />
        </div>
    );
}